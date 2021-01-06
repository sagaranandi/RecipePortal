
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Recipe Finder v2</title>
  <title>Recipe Finder</title>
<link href="https://fonts.googleapis.com/css?family=Coiny|Monofett|Raleway" rel="stylesheet"><link rel="stylesheet" href="./search.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1>Recipe Finder</h1>
<form class="form">
  Enter a search term: <input id="q">
  <select class="health">
  <option value="">Select (None)</option>
  <option value="vegetarian">Vegetarian</option>
  <option value="vegan">Vegan</option>
</select>
  <button class="go">Search</button>
</form>

<div class="results">
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./search.js"></script>

</body>
</html>