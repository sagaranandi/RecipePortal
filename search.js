
  
//comments refer to the code directly underneath

jQuery(document).ready(function($){
  
    //setting global variables
    var app_id = "902b6191";
    var app_key = "b65318fff1794d62089c65034e915ea6";
    var endpointURL = "https://api.edamam.com/search?";
    var health = false;
    
    //putting selected filter into var "health"
    $('.health').change(function(){
      health = $(this).val();
    });
    
    //if go is pressed, function runs
     $('.go').click(function(event){
      go();
      event.preventDefault();
    });
    //if enter key is pressed, function runs
    $('form').submit(function(event){
      go();
      event.preventDefault();
    });
    
    //function to send request to API
   function go(){
     
      var q = $('#q').val();
      var requestURL = endpointURL + 'q=' + q + '&app_id=' + app_id + '&app_key=' + app_key + '&from=0&to=30';
      //if a filter is selected it will be added to the search
      if(health){
        requestURL = requestURL + '&health=' + health;
      }
      
      clearResults();
      getFromApi(requestURL);
  }
  
  //this part makes the actual request
  function getFromApi(requestURL){
      
      $.ajax( {
        url : requestURL,
        dataType : "jsonp",
        success : function(data) { 
         
          console.log(data);
           var results = data.hits;
  
  //generating the displayed results
  results.forEach( function (item){
    //declaring variables
      var image = item.recipe.image;
      var title = item.recipe.label;
      var link = item.recipe.url;
      var howMany = item.recipe.ingredientLines.length;
      var calNum = item.recipe.calories;
      var serves = item.recipe.yield;
      var fatNum = item.recipe.totalNutrients.FAT.quantity;
      var fatUnit = item.recipe.totalNutrients.FAT.unit;
      var fatDay = item.recipe.totalDaily.FAT.quantity;
      var sugNum = item.recipe.totalNutrients.SUGAR.quantity;
      var sugUnit = item.recipe.totalNutrients.SUGAR.unit;
      var calClass = '';
      var fatClass = '';
      var sugClass = '';  
    
    //shortening a title that is too long
    if (title.length > 25){
      title = title.substring(0,24) + '...'
    };
    
    //calculating fat per portion
    fatNum = fatNum / serves;
    //making the number into a string so that we may shorten it
    var fat = fatNum.toString();
    //cutting the excess digits from the fat value
    if (fatNum < 100){
      fat = fat.substring(0,4)
    }
    else{
      fat = fat.substring(0,5)
    };
    
      //changing the colour of the fat div based on % of a person's daily recommendation
    if (fatDay > 55) {
      fatClass= 'orange';
    }
    else if (fatDay > 35) {
     fatClass= 'yellow';
    }
    else{fatClass= 'green';
    };
  
    //calculating calories per portion
    calNum = calNum / serves;
    //making the number into a string so that we may shorten it
    var cal = calNum.toString();
    //cutting the excess digits from the calories value
    if (calNum < 1000){
      cal = cal.substring(0,5)
    }
    else{
      cal = cal.substring(0,6)
    };
  
    //changing the colour of the div based on the calorie count 
    if (calNum > 800) {
      calClass= 'orange';
    }
    else if (calNum > 400) {
     calClass= 'yellow';
    }
    else{
      calClass= 'green';
    };
    
    //calculating sugar per portion
    sugNum = sugNum / serves;
    //making the number into a string so that we may shorten it
    var sug = sugNum.toString();
    //cutting the excess digits from the fat value
    if (sugNum < 100){
      sug = sug.substring(0,4)
    }
    else{
      sug = sug.substring(0,5)
   };
    
    //changing the colour of the sugar div
    if (sugNum > 55) {
      sugClass= 'orange';
    }
    else if (sugNum > 30) {
     sugClass= 'yellow';
    }
    else{
      sugClass= 'green';
    };
   
    //fixes broken image links
      if( image.indexOf('.jpg')<0){
        if(image.indexOf('.JPG')<0){
          if(image.indexOf('.png')<0){
            if(image.indexOf('.PNG')<0){
        image = 'https://www.edamam.com/web-img/f32/f32bb6d8980d49b54c11e1a3dd51a16d.jpg';
          }
         }
        }
       }
    
    //instructions for displaying the results
     $('.results').append('<div class="recipe"><a target="_blank" href="' + link + '"><h2 class="title">' + title + '</h2></a><div class="box"><a target="_blank" href="' + link + '"><img class="pic" src="' + image + '"></a><div class ="infoBox"><div class="info">Serves <b>' + serves + '</b></div><div class="calinfo ' + calClass + '"><b>' + cal + '</b> kcal</div><div class="fatinfo '+ fatClass +'">Fat: <b>' + fat + '</b> ' + fatUnit + '</div><div class="suginfo '+ sugClass +'">Sugar: <b>' + sug + '</b> ' + sugUnit + '</div><div class="info">Uses <b>' + howMany + '</b> ingredients</div></div></div></div>');
  
  });
        },
        error: function(){
          alert('Error getting data from API');
        }
      } );
      
    }
    
    function clearResults(){
      $('.results').empty();
    }
   
  });

