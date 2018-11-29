<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="index.html">Student-Tutor Portal</a>
			</div>
						 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                   <a href="?"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                        <a href="tutdashboard.php"><i class="fa fa-bar-chart-o fa-fw"></i>Courses<span class="fa arrow"></span></a>
                            </li>
                
                 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Announcements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="announce.php">Create Announcement</a>
                                </li>
                                <li>
                                    <a href="viewanntut.php">View Announcement</a>
                                </li>
                            </ul>
                           
                        </li>
                        <li>
                            <a href="viewstd.php"><i class="fa fa-bar-chart-o fa-fw"></i>View students<span class="fa arrow"></span></a>
                        </li>                         
                   <li>
                            <a href="viewact.php"><i class="fa fa-bar-chart-o fa-fw"></i>View Activity points<span class="fa arrow"></span></a>
                  </li>    
                <li>
                <?php if (isset($_SESSION["tutor"])): ?>
		                        <a href="studdashboard.php?tutlogout='1'"><i class="fa fa-bar-chart-o fa-fw"></i>Logout</a>
		                        <?php endif ?>
                </li>  
                  </ul>      				  
                </div>
               
            </div>
            
        </nav>