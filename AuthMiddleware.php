<?php
class AuthMiddleware {
    public static function authenticate() {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit;
        }

        $token = str_replace('Bearer ', '', $headers['Authorization']);
        // Vérifier le token ici (exemple simple)
        if ($token !== 'votre_token_secret') {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit;
        }
    }
}
?>
