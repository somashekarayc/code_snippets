<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<section class="pt-10">
					<div class="com-sp pad-bot-70" id="blog1">
						<div class="row">
							<?php
							$blogs_sql = $hubli_querry->validate_blogs_course_details();
							$blog_count = 0;
							while ($blogs_row = mysqli_fetch_array($blogs_sql)) {
							?>

								<div class="col-md-12" id="blog_section_<?php echo $blog_count; ?>">
									<div class="blog-container p-4">

										<div class="row">
											<div class="col-md-12">
												<h3 class="college-blog-title c-blog-title mb-3 text-dark"><strong><?php echo $blogs_row['blogs_title']; ?></strong></h3>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3 col-sm-3">
												<a href="#" class="thumbnail">
													<img loading="lazy" class="lazyload" data-src="images/blogs/<?php echo $blogs_row['blogs_image']; ?>" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9">
												<div id="taboids" data-ft style="display: none;">

													<nav>
														<a href="#tab_nav_1_<?php echo $blogs_row['blogsid']; ?>" class="active">About College</a>

													</nav>

													<div>

														<div>
															<p><?php
																echo strip_tags(substr($blogs_row['blogs_about_college'], 0, 300));
																?>

															<div class="mt-2"><a href='college-details/<?php echo clean($blogs_row['blogs_title']) . "/" . $blogs_row['blogs_college'] ?>' class="btn btn-outline-danger" target="_blank">Read more</a></div>
															</p>
														</div>

														<div>

														</div>

														<div>

														</div>

														<div>

														</div>
													</div><!-- tab inner container end -->

												</div><!-- tab outer container end -->

											</div><!-- 2nd row col-9 end -->
										</div><!-- 2nd row end -->
									</div>

								</div>


							<?php
								$blog_count++;
							} ?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>