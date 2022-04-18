<?php
	if(isset($_POST["userName"]) && isset($_POST["userAge"]) && isset($_POST["userGender"]) && isset($_POST["comments"]))
	{
		$name = htmlentities($_POST["userName"]);
		$age = htmlentities($_POST["userAge"]);

		if($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK)
		{
			$photo = $_FILES["filename"]["name"];
			move_uploaded_file($_FILES["filename"]["name"], $photo);
		}

		$gender = htmlentities($_POST["userGender"]);

		$agreement = "Не согласен";
		if(isset($_POST["agreement"])) $agreement = "Согласен";

		$branch = $_POST["branch"];

		$comment = htmlentities($_POST["comments"]);

		$output = "
		<!DOCTYPE html>
		<html lang=\"ru\">
			<head>
				<meta charset=\"UTF-8\">
				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
				<link rel=\"stylesheet\" href=\"style.css\">
				<title>Сервер с данными</title>
			</head>
			<body align=\"center\">
				<h1>Данные пришедшие на сервер</h1>
				<h3>Имя пользователя: <i>$name</i></h3>
				<h3>Возраст пользователя: <i>$age</i></h3>
				<h3>Фотография пользователя: </h3>
				<img src=\"$photo\" alt=\"Фотография не поддерживается\" width=\"250\" height=\"250\">
				<h3>Пол пользователя: <i>$gender</i></h3>
				<h3>Согласен ли он: <i>$agreement</i></h3>
				<h3>Направление: <i>$branch</i></h3>
				<h3>О себе: <i>$comment</i></h3>
			</body>
		</html>
		";
		echo $output;
	}
	else
	{
		$output = "
		<!DOCTYPE html>
		<html lang=\"ru\">
			<head>
				<meta charset=\"UTF-8\">
				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
				<link rel=\"stylesheet\" href=\"style.css\">
				<title>Сервер с данными</title>
			</head>
			<body>
				<h1 align=\"center\">Введены некорректные данные!</h1>
			</body>
		</html>
		";
		echo $output;
	}
?>