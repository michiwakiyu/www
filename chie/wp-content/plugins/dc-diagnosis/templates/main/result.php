	<div class="dcd-result">
		<div class="modal">
			<input id="copy-result" class="checkbox" type="checkbox">
			<div class="modal-overlay">
				<label for="copy-result" class="o-close"></label>
				<div class="modal-wrap a-center">
					<label for="copy-result" class="close">&#10006;</label>
					<p id="copy-result-text"></p>
				</div>
			</div>
		</div>

		<div class="dcd-bunpu">
			<div class="tabs <?php if ( $national_survey_flg == 1 ) echo "four"; ?>">
				<input type="radio" name="tab_item" id="comp_gender" checked>
				<label class="tab_item" for="comp_gender">男女別比較</label>
				<input type="radio" name="tab_item" id="comp_age">
				<label class="tab_item" for="comp_age">年代別比較</label>
				<input type="radio" name="tab_item" id="comp_number">
				<label class="tab_item" for="comp_number">人数群比較</label>
				<?php if ( $national_survey_flg == 1 ): ?>
				<input type="radio" name="tab_item" id="comp_national">
				<label class="tab_item" for="comp_national">全国比較</label>
				<?php endif; ?>

				<div class="tab_content" id="comp_gender_content">
					<div class="tab_content_description">
						<div class="summary_graph_wrap">
							<p class="y-coordinate high"><?php echo esc_html( $scale_high ); ?></p>
							<p class="y-coordinate row"><?php echo esc_html( $scale_low ); ?></p>
							<p class="y-coordinate you"><?php echo $target; ?>のライン<span></span></p>
							<div class="summary_graph">
								<div class="item male">
									<div class="bar">
										<div class="text"></div>
										<div class="color"></div>
									</div>
									<div class="x-coordinate">男性</div>
								</div>
								<div class="item female">
									<div class="bar">
										<div class="text"></div>
										<div class="color"></div>
									</div>
									<div class="x-coordinate">女性</div>
								</div>
							</div>
						</div>
						<div class="graph_description"><?php echo $graph_description_gender; ?></div>
					</div>
				</div>
				<div class="tab_content" id="comp_age_content">
					<div class="tab_content_description">
						<div class="summary_graph_wrap">
							<p class="y-coordinate high"><?php echo esc_html( $scale_high ); ?></p>
							<p class="y-coordinate row"><?php echo esc_html( $scale_low ); ?></p>
							<p class="y-coordinate you"><?php echo $target; ?>のライン<span></span></p>
							<div class="summary_graph">
							</div>
						</div>
						<div class="graph_description"><?php echo $graph_description_age; ?></div>
					</div>
				</div>
				<div class="tab_content" id="comp_number_content">
					<div class="tab_content_description">
						<div class="summary_graph_wrap">
							<p class="y-coordinate belong"><?php echo $target; ?>が所属する群<br >↓</p>
							<div class="summary_graph">
							</div>
						</div>
						<div class="graph_description"><?php echo $graph_description_number; ?></div>
					</div>
				</div>
				<div class="tab_content" id="comp_national_content">
					<div class="tab_content_description">
						<div class="summary_graph_wrap">
							<ul>
								<li>
									<p class="total">総合</p>
									<?php if ( $national_survey_data ) : ?>
									<table>
										<thead>
											<tr>
												<th>順位</th>
												<th>都道府県</th>
												<th>平均値</th>
												<th>回答数</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ( $national_survey_data as $data ): ?>
											<tr pref-name="<?php echo $data[1]; ?>">
												<td><?php echo $data[0]; ?></td>
												<td><?php echo $data[1]; ?></td>
												<td><?php echo round( $data[2], 2 ); ?></td>
												<td><?php echo $data[3]; ?></td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
									<?php else: ?>
										データなし
									<?php endif; ?>
								</li>
								<li>
									<p class="male">男性</p>
									<?php if ( $national_survey_data_male ) : ?>
									<table>
										<thead>
											<tr>
												<th>順位</th>
												<th>都道府県</th>
												<th>平均値</th>
												<th>回答数</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ( $national_survey_data_male as $data ): ?>
											<tr pref-name="<?php echo $data[1]; ?>">
												<td><?php echo $data[0]; ?></td>
												<td><?php echo $data[1]; ?></td>
												<td><?php echo round( $data[2], 2 ); ?></td>
												<td><?php echo $data[3]; ?></td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
									<?php else: ?>
										データなし
									<?php endif; ?>
								</li>
								<li>
									<p class="female">女性</p>
									<?php if ( $national_survey_data_female ) : ?>
									<table>
										<thead>
											<tr>
												<th>順位</th>
												<th>都道府県</th>
												<th>平均値</th>
												<th>回答数</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ( $national_survey_data_female as $data ): ?>
											<tr pref-name="<?php echo $data[1]; ?>">
												<td><?php echo $data[0]; ?></td>
												<td><?php echo $data[1]; ?></td>
												<td><?php echo round( $data[2], 2 ); ?></td>
												<td><?php echo $data[3]; ?></td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
									<?php else: ?>
										データなし
									<?php endif; ?>
								</li>
							</ul>
						</div>
						<div class="graph_description"><?php echo $graph_description_national; ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="dcd-type">
			<?php if ( $type1_title != '' && $type1_description != '') : ?>
			<div class="type_box">
				<input type="checkbox" id="type1_bar" class="accordion" />
				<label for="type1_bar"><?php echo esc_html( $type1_title ); ?></label>
				<div class="type_detail">
					<div class="type_detail_inner"><?php echo $type1_description; ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $type2_title != '' && $type2_description != '') : ?>
			<div class="type_box">
				<input type="checkbox" id="type2_bar" class="accordion" />
				<label for="type2_bar"><?php echo esc_html( $type2_title ); ?></label>
				<div class="type_detail">
					<div class="type_detail_inner"><?php echo $type2_description; ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $type3_title != '' && $type3_description != '') : ?>
			<div class="type_box">
				<input type="checkbox" id="type3_bar" class="accordion" />
				<label for="type3_bar"><?php echo esc_html( $type3_title ); ?></label>
				<div class="type_detail">
					<div class="type_detail_inner"><?php echo $type3_description; ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $type4_title != '' && $type4_description != '') : ?>
			<div class="type_box">
				<input type="checkbox" id="type4_bar" class="accordion" />
				<label for="type4_bar"><?php echo esc_html( $type4_title ); ?></label>
				<div class="type_detail">
					<div class="type_detail_inner"><?php echo $type4_description; ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $type5_title != '' && $type5_description != '') : ?>
			<div class="type_box">
				<input type="checkbox" id="type5_bar" class="accordion" />
				<label for="type5_bar"><?php echo esc_html( $type5_title ); ?></label>
				<div class="type_detail">
					<div class="type_detail_inner"><?php echo $type5_description; ?></div>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="dcd-clear">
				<button id="clear_diagnosis" type="reset"><img src="<?php echo plugins_url( DCD_Config::NAME ) . '/images/btn-clear.png'; ?>" alt="はじめから診断する" /></button>
		</div>
		<div class="dcd-result-url">
            <p>この診断を友達に伝える</p>
            <p class="top_url"></p>
            <br>
            <p><?php echo $target; ?>の診断結果</p>
			<p class="url"></p>
		</div>
		<ul class="social">
			<li><a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></li>
			<li>
				<div class="fb-like" data-href="<?php echo the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			</li>
			<li>
				<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</li>
			<li><a href="https://timeline.line.me/social-plugin/share?url=<?php echo the_permalink(); ?>"><img src="<?php echo plugins_url( DCD_Config::NAME ) . '/images/share-line.png'; ?>"></a></li>
		</ul>
	</div>
