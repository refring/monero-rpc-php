<?php

namespace RefRing\MoneroRpcPhp\Http;

/**
 * A simple implementation of the digest authentication challenge specifcally for the monero rpc servers
 *
 * @see https://datatracker.ietf.org/doc/html/rfc2617
 */
class DigestAuthentication
{
    public function __construct(private readonly string $username, private readonly string $password, private readonly string $uri, private readonly string $method)
    {

    }

    public function getDigestResponse(string $challengeHeader): string
    {
        $parts = $this->analyzeWwwAuthenticateHeader($challengeHeader);
        return $this->getDigest($this->username, $this->password, $parts['realm'], $this->method, $this->uri, $parts['nonce'], $parts['algorithm'], $parts['qop']);
    }

    /**
     * @return array<string, string>
     */
    private function analyzeWwwAuthenticateHeader(string $header): array
    {
        // WWW-authenticate: Digest qop="auth",algorithm=MD5-sess,realm="monero-rpc",nonce="RuNBBhFd01EjzYvZY/S0GQ==",stale=false
        $strippedHeader = preg_replace("/^Digest/i", "", $header);
        $headerParts = explode(',', (string) $strippedHeader);

        $authPieces = array();
        foreach ($headerParts as $piece) {
            $piece = explode('=', trim($piece));
            $key = array_shift($piece);
            $value = trim(implode('=', $piece), '"');
            $authPieces[$key] = $value;
        }

        return $authPieces;
    }

    private function getDigest(string $username, string $password, string $realm, string $method, string $uri, string $nonce, string $algorithm, string $qop): string
    {
        $nonceCount = str_pad('1', 8, '0', STR_PAD_LEFT);
        $cnonce = uniqid();
        $a1 = hash('md5', "{$username}:{$realm}:{$password}");
        $a2 = hash('md5', "{$method}:{$uri}");

        // Digest username="foo", realm="monero-rpc", nonce="MabGPXDFZAfFXcRkSr+RnQ==", uri="/json_rpc", algorithm=MD5-sess, response="7c14eda67b93d7f10e86130c20e1fc70", qop=auth, nc=00000002, cnonce="1d5d394033061298"
        $response = hash('md5', "$a1:{$nonce}:{$nonceCount}:{$cnonce}:{$qop}:$a2");

        $format = 'Digest username="%s", realm="%s", nonce="%s", uri="%s", algorithm="%s", response="%s", qop=%s, nc=%s, cnonce="%s"';

        $digest_header = sprintf($format, $username, $realm, $nonce, $uri, $algorithm, $response, $qop, $nonceCount, $cnonce);

        return $digest_header;
    }
}
