<?php
$app->post('/api/login', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
	$email = $params['username'];
    $password = $params['password'];

    $selectStatement = $pdo->select()
                            ->from('login')
                            ->where('username', '=', $username)
                            ->where('password', '=', $password);

	$stmt = $selectStatement->execute();
    
    if ($stmt->rowCount() >0)
        $res['status'] = true;
    else
        $res['status'] = false;

	// $res['data'] = $stmt->fetchAll();
    $response->write(json_encode($res));
    
	$pdo = null;
	return $response;
});
?>
