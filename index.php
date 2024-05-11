<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ЛР2</title>
</head>
<body>
  <?php
    require_once "connection.php";
  ?>

  Література зазначеного видавництва
  <form method="post" action="literatureByPub.php">
		<select name="publisher">
			<?php
				$cursor = $collection->find([],["projection" => ["publisher" => 1, "_id" => 0]]);
				foreach($cursor as $item){
					if($item->publisher){
						echo "<option value='$item->publisher'>" . $item->publisher . "</option>";
					} 
				}
			?>
		</select>
		<input type="submit" value="Обрати">
	</form>

  Література, опублікованій за вказаний часовий період (враховувати рік видання)
  <form method="post" action="literatureByDate.php">
    <label for="first_date">Перша дата</label>
    <input type="number" id="first_date" name="first_date" value="2017">
    <label for="second_date">Друга дата</label>
		<input type="number" id="second_date" name="second_date" value="2023">
		<input type="submit" value="Обрати">
  </form>

  Література зазначеного автора
  <form method="post" action="literatureByAuthor.php">
		<select name="author">
			<?php
				$cursor = $collection->find([],["projection" => ["author" => 1, "_id" => 0]]);
				foreach($cursor as $item){
					if($item->author){
						echo "<option value='$item->author'>" . $item->author . "</option>";
					} 
				}
			?>
		</select>
		<input type="submit" value="Обрати">
	</form>
  
  <script>
				const data = localStorage.getItem('storage');
				const result = JSON.parse(data);
				if (result) {
					var output = "";
					result.forEach(function(item) {
						var values = Object.values(item);
						values.forEach(function(value) {
						output += "<li>" + value + "</li>";
						});
					});
					document.write(output);
				} else {
					document.write("Попереднього запиту немає");
				}
  </script>
</body>
</html>