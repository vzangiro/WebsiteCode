<?php
$app->post('/api/login', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
	$username = $params['username'];
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

$app->post('/api/comment', function ($request, $response, $args) { //POST example

    $pdo =$this->pdo;
   $params = $request->getParsedBody();
   $username = $params['username'];
   $comment = $params['comment'];

   $insertStatement = $pdo->insert(array(  'username', 'password' ))
                               ->into('login')
                               ->values(array($username, $password));
   $insert =  $insertStatement->execute();

   $res['insert'] = $insert; // id of the record
   $res['status'] = 'success';
   $response->write(json_encode($res));
   $pdo = null;
   return $response;
?>
