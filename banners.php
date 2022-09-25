
				<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_files order by date_time desc") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) 
				{
					$file=$row['file_name'];
					$temp = explode(".",$file);
//echo $temp[0];
				?> 		
								<tr>
                                    <td><?php echo $i ;?></td>
									<td><a  href="#view<?php echo $row['id']; ?>" data-toggle="modal" ><span style="font-size: 18px ! important; font-weight: 700;"><i class="fa fa fa-paperclip fa-lg"></i> <?php echo  $temp[0]; ?></span></a><br/><?php echo  $temp[1]; ?></td>
									<td><?php echo $row['Modifier']; ?></td>
									<td><?php echo $row['date_time']; ?></td>
									<td>
									<a href="#delete<?php echo $row['id']; ?>" data-toggle="modal"  class="btn btn-xs btn-danger">Clear</a>
									</td>
								</tr>
								<?php $i++; }?>
								
						