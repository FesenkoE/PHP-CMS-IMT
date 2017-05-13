<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="appearance/css/font-awesome.css">	
    <link rel="stylesheet" type="text/css" href="appearance/css/style.css">       
    <title>My Project</title>
   </head>     
<body>
<header>

<!-- MENU -->
	<nav>
		<ul class="menu">
			<? require_once 'includes/menu.php' ?>
		</ul>
  </nav> 

<!-- BANNER -->
  <section class="banner">
    
  </section>

    <div class="category_products">
        <h3>Категории товаров</h3>
    </div>
  <section class="showcase">
     
      <div class="tree_products">
          <? require_once 'includes/categories.php' ?>
      </div>
      <div class="products">
          <ul class="product">
              <? require_once 'includes/products.php' ?>
          </ul>
      </div>    
  </section>
	

 	  	
</header>



</body>
</html> 