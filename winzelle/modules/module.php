
<?php

class Module
{

    public function base_url()
    {
        $type = $_GET['type'] ?? '';


        switch ($type) {
            case 'json':
                return json_encode([
                    'data' => 'test data json'
                ]);

            case 'html':
                return json_encode([
                    'data' => 'test data html'
                ]);
            case 'design':
                return json_encode([
                    'data' => 'test data design'
                ]);
            default:
                return json_encode([
                    header('location:./../err.php')
                ]);
        }
    }
}


?>