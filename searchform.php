<!-- <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
     <fieldset>
         <label for="s" class="screen-reader-text">Search for:</label>
         <input type="search" id="s" name="s" placeholder="Enter keywords" required />
         <input type="image" id="searchsubmit" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/searchicon.png" />
     </fieldset>
</form> -->
<form class="navbar-form navbar-right " action="<?php bloginfo('siteurl'); ?>" method="get" role="form">
					            
	<div class="form-group form-horizontal">
	  <span class='glyphicon glyphicon-search'></span>
      <input id="navbar-search-form" type="text" placeholder="What do you want to know about me?" class="form-control" name="s">
    </div>
    <button type="submit" class="btn btn-success">Search</button>
  </form>
</div>