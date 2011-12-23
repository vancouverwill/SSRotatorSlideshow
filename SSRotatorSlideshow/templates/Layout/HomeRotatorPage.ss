<div class="typography">
	
	<% if Level(2) %>
	  	<% include BreadCrumbs %>
	<% end_if %>
	

		$Content
		$Form
		$PageComments

		
		<h1> test content</h1>
<div id="main" class="container">
	<!-- image -->

	<div class="main_image">
		<% control  Rotators %>
		<!-- if  ID = 5 -->
			<a class='linkTo' href='#'>
			<img src="$SlideImage.URL" alt="$SlideTitle" />
			</a>
			<div class="desc">
				<div class="block">
					<h2>$SlideTitle</h2>
							
						<p>$SlideDescription </p>
				</div>
			</div>
		<!-- end_if  -->
		<% end_control %>
		<a class='linkTo' href='# Id- $ID'>
			<img src="$SlideImage.URL" alt="$SlideTitle Id- $ID" />
			</a>
			<div class="desc">
				<div class="block">
					<h2>$SlideTitle</h2>
							
						<p>$SlideDescription </p>
				</div>
			</div>
		</div>
	<!-- liste -->
	<div class="image_thumb">
		<ul>
			<% control  Rotators %>
				<% if  ID = 10 %>
					<li class='last'>
				<% else  %>
					<li class=''>
				<% end_if  %>
				
				<a href="$SlideImage.URL"><img src="$SlideThumb.URL" alt="$SlideTitle" style='max-width:50px; max-height:38px; ' /></a>
				<div class="block">
					<h2>$SlideTitle</h2>
					
					<p>$SlideDescription </p>
				</div>
				<p class='linkTo'>$SlideLink</p>

			</li>
			<% end_control %>

		</ul>
	</div>
</div>		
		
		
</div>		
		
		
		