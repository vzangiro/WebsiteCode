<?php
$app->post('/api/signup', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
    $username = $params['username'];
    $email = $params['email'];
    $password = $password['password'];

    $selectStatement = $pdo->select()
                            ->from('user')
                            ->where('username','=', $username)
                            ->where('email', '=', $email)
                            ->where('password','=', $password);

    $stmt = $selectStatement->execute();
    $signup = $stmt->fetchAll();
    
    $res['signup'] = $signup;

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
