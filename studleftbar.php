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
                        <a href="studdashboard.php"><i class="fa fa-bar-chart-o fa-fw"></i>Courses<span class="fa arrow"></span></a>
                            </li>
                
                 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Activity Points<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addactivity.php">Add Activity Points</a>
                                </li>
                                <li>
                                    <a href="viewactivity.php">View Activity Points</a>
                                </li>
                            </ul>
                           
                        </li>
                            
                                            
                   <li>
                            <a href="viewtut.php"><i class="fa fa-bar-chart-o fa-fw"></i>View Tutor<span class="fa arrow"></span></a>
                  </li>
                  <li>
                            <a href="viewann.php"><i class="fa fa-bar-chart-o fa-fw"></i>View Announcement<span class="fa arrow"></span></a>
                  </li>  
                <li>
                <?php if (isset($_SESSION["student"])): ?>
		        <a href="studdashboard.php?studlogout='1'"><i class="fa fa-bar-chart-o fa-fw"></i>Logout</a>
		        <?php endif ?>
                </li>     
                  </ul>      				  
                </div>
               
            </div>
            
        </nav>