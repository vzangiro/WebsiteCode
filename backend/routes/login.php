<?php


$app->get('/api/login', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('login');
	$stmt = $selectStatement->execute();
	$contacts= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $contacts;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of insert
$app->post('/api/login', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$username = $params['username'];
    $password = $params['password'];

    $insertStatement = $pdo->insert(array(  'username', 'password' ))
								->into('login')
								->values(array($username, $password));
    $insert =  $insertStatement->execute();

	$res['insert'] = $insert; // id of the record
	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});



?>