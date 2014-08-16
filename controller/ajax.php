<?php 

$app->post('/unlock/:id', function ($id) use ($app) {

	$db = getDbHandler();

	$sql = "INSERT INTO unlock_request (federation_id, primary_union_id, pu_datasheet_id, cdate, comment) "
			. "VALUES (:fid, :pid, :id, NOW(), :comment) ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':fid' => $_SESSION['user_federation_id'], ':pid' => $_SESSION['user_primary_union_id'], ':id' => $id, ':comment' => $_POST['comment']));

	$app->contentType('application/json');
	echo json_encode(array());

});

$app->post('/unlockp/:id', function ($id) use ($app) {

	$db = getDbHandler();

	$sql = "INSERT INTO unlock_request (federation_id, primary_union_id, pu_profile_id, cdate, comment) "
		 . " VALUES (:fid, :pid, :id, NOW(), :comment) ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':fid' => $_SESSION['user_federation_id'], ':pid' => $_SESSION['user_primary_union_id'], ':id' => $id, ':comment' => $_POST['comment']));

	$app->contentType('application/json');
	echo json_encode(array());

});

$app->post("/bsgroup", function () use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "INSERT INTO balancesheet_group (name) VALUES (:name)";
	$sth = $db->prepare($sql);
	$sth->execute(array(':name' => $_POST['name']));

	$id = $db->lastInsertId();

	$json = array('id' => $id, 'name' => $_POST['name']);
	$app->contentType('application/json');
	echo json_encode($json);

});

$app->get("/bssubgroup/:group_id", function ($group_id) use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "SELECT id, name FROM balancesheet_sub_group WHERE group_id = :group_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':group_id' => $group_id));

	$json['subgroups'] = $sth->fetchAll();

	$app->contentType('application/json');
	echo json_encode($json);

});

$app->post("/bssubgroup", function () use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "INSERT INTO balancesheet_sub_group (group_id, name) VALUES (:group_id, :name)";
	$sth = $db->prepare($sql);
	$sth->execute(array(':group_id' => $_POST['mgroup_id'], ':name' => $_POST['name']));

	$id = $db->lastInsertId();

	$json = array('id' => $id, 'name' => $_POST['name']);
	$app->contentType('application/json');
	echo json_encode($json);

});

$app->get("/federations/:country_id", function ($country_id) use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "SELECT id, name FROM federation WHERE country_id = :country_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':country_id' => $country_id));

	$json['federations'] = $sth->fetchAll(PDO::FETCH_ASSOC);

	$app->contentType('application/json');
	echo json_encode($json);

});

$app->post("/isgroup", function () use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "INSERT INTO is_group (name) VALUES (:name)";
	$sth = $db->prepare($sql);
	$sth->execute(array(':name' => $_POST['name']));

	$id = $db->lastInsertId();

	$json = array('id' => $id, 'name' => $_POST['name']);
	$app->contentType('application/json');
	echo json_encode($json);

});
	
$app->get("/issubgroup/:group_id", function ($group_id) use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "SELECT id, name FROM is_sub_group WHERE group_id = :group_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':group_id' => $group_id));

	$json['subgroups'] = $sth->fetchAll();

	$app->contentType('application/json');
	echo json_encode($json);

});
	
$app->post("/issubgroup", function () use ($app, $smarty) {
	$db = getDbHandler();

	$sql = "INSERT INTO is_sub_group (group_id, name) VALUES (:group_id, :name)";
	$sth = $db->prepare($sql);
	$sth->execute(array(':group_id' => $_POST['mgroup_id'], ':name' => $_POST['name']));

	$id = $db->lastInsertId();

	$json = array('id' => $id, 'name' => $_POST['name']);
	$app->contentType('application/json');
	echo json_encode($json);

});