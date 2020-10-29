<?php include "includes/utilities.php"; 
	$section="Systems & Integration"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>The Oldham Group - <?php echo $section; ?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.15.custom.min.js"></script>
		<script type="text/javascript" src="js/oldham.js"></script>

	<script>
	$(document).ready(function() {
		$( "#tabs" ).tabs();
	});
	</script>
    
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60130712-1', 'auto');
  ga('send', 'pageview');

</script> 
    </head>

<body>


<?php include "includes/header.php"; ?>

<div id="pagecontent">

<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><table><tr height="25px"><td>&nbsp;</td><td>Overview</td></tr></table></a></li>
		<li><a href="#tabs-2"><table><tr height="25px"><td></td><td>Color &amp; Proofing</td></tr></table></a></li>
		<li><a href="#tabs-3"><table><tr height="25px"><td></td><td>Collaboration &amp; W2P</td></tr></table></a></li>
		<li><a href="#tabs-4"><table><tr height="25px"><td></td><td>Workflow</td></tr></table></a></li>
		<li><a href="#tabs-5"><table><tr height="25px"><td></td><td>QC &amp; RIP Options</td></tr></table></a></li>
        <li><a href="#tabs-6"><table><tr height="25px"><td></td><td>Systems &amp; Storage</td></tr></table></a></li>
	</ul>
	<div id="tabs-1">
    	<div id="contenttab">
    	<div  id="textcontain" style="font-size:12pt; width:750px">
		<p>As the digital revolution continues, it has produced a dizzying array of systems for online customer interaction as well as internal production. Connecting the myriad products into a cohesive whole takes time and experience. From basic workflow systems to full prepress automation, web to print, VDP, project collaboration, online approval and advanced color management strategies, Oldham has the knowledge and skills you need to keep on top of today's technical advancements. Our staff has experience in all areas of print, graphics and computer systems spanning offset, flexo, digital and wide format, all common (and some uncommon) operating systems, storage networks, backup strategies and internet capabilities.</p><br/><p>
        If you need to upgrade systems, are curious about new capabilties or need help managing your systems, we have the products and talent to help.
        </p></div>
        	<?php getMoreInfo(""); ?>

        </div>
	</div>
	<div id="tabs-2">
    	<div id="contenttab">
                    	<div id="infoWndw2" class="infoWndw" style="display:none;"></div>
   			<div id="vendorlist" >
            
            <?php getVendors("Color & Proofing","2"); ?>

    		</div>
    		<div id="textcontain" style="font-size:12pt">
    			<p>The ability to manage color across multiple input and output devices is no longer the luxury it once was. A color managed proofing system is an absolute necessity. Ever shorter production schedules require the ability to guarantee color throughout the production cycle.</p><br/><p>

Oldham has the expertise to deliver top quality color managed proofing solutions. Do you need an internet enabled soft proofing solution, or a contract-quality inkjet proof? Maybe you're in the market for a double sided impostion proofer? Oldham provides custom ICC profile creation services and color management training to keep your color in control. </p>
			</div>
        	<?php getMoreInfo("Color & Proofing"); ?>
       </div>
    </div>
	<div id="tabs-3">
    	<div id="contenttab">
                    	<div id="infoWndw3" class="infoWndw" style="display:none;"></div>
   			<div id="vendorlist" >
            <?php getVendors("Collaboration & W2P","3"); ?>

    		</div>
    		<div id="textcontain" style="font-size:12pt">
Are you looking for a way to connect with your customers over the web? Do you want to provide Business to Consumer or Business to Business solutions via an interactive web-based interface? The Oldham Group can provide you with a Web-To-Print solution that not only provides a web front end for your customers to order and track jobs, but we also have the expertise to optimize your back-end workflow to efficiently get these jobs through your shop as quickly as possible. 
			</div>
        	<?php getMoreInfo("Collaboration & W2P"); ?>
		</div>
	</div>
	<div id="tabs-4">
    	<div  id="contenttab">
                    	<div id="infoWndw4" class="infoWndw" style="display:none;"></div>
   			<div id="vendorlist" >
            <?php getVendors("Workflow","4"); ?>
    		</div>
    		<div id="textcontain" style="font-size:12pt">
<p>An efficient workflow is the centerpiece of an effective prepress facility. Today there are endless options that make for a myriad of questions. Which one fits your company best? Will my new system drive my existing platesetter? What system will help me better connect with my customers? Oldham has the expertise and the knowledge to not only answer your questions but provide a system that best fits your companies needs and budget. </p><br/><p>
Oldham has JDF enabled solutions that will provide that link between you and your customers, as well as streamline your production to provide maximum efficiency. Not only that, but Oldham has the expertise on staff to help implement JDF in your shop today. </p>
			</div>
        	<?php getMoreInfo("Workflow"); ?>
         </div>
	</div>
	<div id="tabs-5">
    	<div id="contenttab">
                    	<div id="infoWndw5" class="infoWndw" style="display:none;"></div>
   			<div id="vendorlist" >
            <?php getVendors("QC & RIP Options","5"); ?>
    		</div>
    		<div id="textcontain" style="font-size:12pt">
Higher job throughput, tighter cost control and limited operator time require new approaches to internal QC operations. Oldham has systems that can speed up RIP output, improve image quality and check color, plate files and file alterations. Color critical approvals can be done on screen, even press side. Initial press key settings can be automated even on older presses.

Oldham has the expertise to help you keep your QC and pressroom at the top efficiency and quality.
			</div>
        	<?php getMoreInfo("QC & RIP Options"); ?>
        </div>
	</div>
    <div id="tabs-6">
    	<div id="contenttab">
                    	<div id="infoWndw6" class="infoWndw" style="display:none;"></div>
   			<div id="vendorlist" >
            <?php getVendors("Systems & Storage","6"); ?>
    		</div>
    		<div id="textcontain" style="font-size:12pt">
The foundation of a building is the most important part. Problems with the base cause instability higher up. In the same way, problems with the infrastructure of your prepress facility can cause huge problems further upstream.

Oldham provides a complete line of workstations, servers, storage, networking and archiving solutions to keep your production facility operating at peak efficiency. We also provide the expertise to install and maintain your systems over the long run.

What foundation is your prepress facility built on?
			</div> 
        	<?php getMoreInfo("Systems & Storage"); ?>
		</div>
        </div>
        </div>

</div>

</div>
				<?php include "includes/footer.php" ?>

    </body>
</html>
