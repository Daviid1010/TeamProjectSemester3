<!DOCTYPE html>
<html>
<head>
	<title>Fantasy Rugby</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="navbar-static-top navbar-inverse" id="home">
	<div class="container">
		<div class="navbar-brand">
			Market
		</div>
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
			Menu
		</button>
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="#">Home</a></li>
				<li><a href="#">Team</a></li>
				<li><a href="#">Market</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="jumbotron">
	<div class="container">
		<h1>Market</h1>
		<p>Create the ultimate team</p>
	</div>
</div>


<div class="alt1 padding" id="market">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="text-center">Player</h2>
				<p class="text-justify">Todays best discount!</p>
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
			</div>
			<div class="col-md-6">

			</div>
			<div class="col-md-6">
				<h2 class="text-center">20% off Peter O`Mahony</h2>
				<input type="submit" id="search" value="BUY NOW" />
			</div>

		</div>
	</div>
</div>


<div class="alt2 padding" id="market">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />
			</div>
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />

			</div>
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />
			</div>
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />
			</div>
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />

			</div>
			<div class="col-md-4">
				<table style="width:100%">
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Rating</th>
						<th>Team</th>
					</tr>
					<tr>
						<td>Brian Kelly</td>
						<td>Winger</td>
						<td>8.5</td>
						<td>Leinster</td>
					</tr>
				</table>
				<p> </p>
				<a href="#" class="btn btn-default">Buy Now!</a>
				<img src="cGilroy.png" alt="C Gilroy" />
			</div>

		</div>
	</div>
</div>



<div class="alt2">
	<div class="container">
		<footer>
			<a href="#home">Back to top</a>
		</footer>
	</div>
</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
</body>
</html>