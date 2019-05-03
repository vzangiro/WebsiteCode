<?php

$app->get('/api/comment', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('commentBox');
	$stmt = $selectStatement->execute();
	$contacts= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $contacts;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of insert
$app->post('/api/comment', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$email = $params['email'];
    $comment = $params['comment'];

    $insertStatement = $pdo->insert(array(  'email', 'comment' ))
								->into('commentBox')
								->values(array($email, $comment));
    $insert =  $insertStatement->execute();

	$res['insert'] = $insert; // id of the record
	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});



?>
