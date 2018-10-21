			<table class="dcd-options-table">
				<tr>
					<th><?php echo $target; ?>の生まれた年は?</th>
					<td><select id="year" name="birth_year"><option value="0">----</option></select>年</td>
				</tr>
				<tr>
					<th><?php echo $target; ?>の性別は？</th>
					<td><input type="radio" id="male" name="gender" value="1"><label for="male">男</label>　<input type="radio" id="female" name="gender" value="2"><label for="female">女</label></td>
				</tr>
				<?php if ( $national_survey_flg == 1 ): ?>
				<tr>
					<th><?php echo $target; ?>のお住まいは？</th>
					<td>
						<select name="pref">
							<option value="">----</option>
							<option value="北海道">北海道</option>
							<option value="青森県">青森県</option>
							<option value="岩手県">岩手県</option>
							<option value="宮城県">宮城県</option>
							<option value="秋田県">秋田県</option>
							<option value="山形県">山形県</option>
							<option value="福島県">福島県</option>
							<option value="茨城県">茨城県</option>
							<option value="栃木県">栃木県</option>
							<option value="群馬県">群馬県</option>
							<option value="埼玉県">埼玉県</option>
							<option value="千葉県">千葉県</option>
							<option value="東京都">東京都</option>
							<option value="神奈川県">神奈川県</option>
							<option value="新潟県">新潟県</option>
							<option value="富山県">富山県</option>
							<option value="石川県">石川県</option>
							<option value="福井県">福井県</option>
							<option value="山梨県">山梨県</option>
							<option value="長野県">長野県</option>
							<option value="岐阜県">岐阜県</option>
							<option value="静岡県">静岡県</option>
							<option value="愛知県">愛知県</option>
							<option value="三重県">三重県</option>
							<option value="滋賀県">滋賀県</option>
							<option value="京都府">京都府</option>
							<option value="大阪府">大阪府</option>
							<option value="兵庫県">兵庫県</option>
							<option value="奈良県">奈良県</option>
							<option value="和歌山県">和歌山県</option>
							<option value="鳥取県">鳥取県</option>
							<option value="島根県">島根県</option>
							<option value="岡山県">岡山県</option>
							<option value="広島県">広島県</option>
							<option value="山口県">山口県</option>
							<option value="徳島県">徳島県</option>
							<option value="香川県">香川県</option>
							<option value="愛媛県">愛媛県</option>
							<option value="高知県">高知県</option>
							<option value="福岡県">福岡県</option>
							<option value="佐賀県">佐賀県</option>
							<option value="長崎県">長崎県</option>
							<option value="熊本県">熊本県</option>
							<option value="大分県">大分県</option>
							<option value="宮崎県">宮崎県</option>
							<option value="鹿児島県">鹿児島県</option>
							<option value="沖縄県">沖縄県</option>
						</select>
					</td>
				</tr>
				<?php endif; ?>
			</table>
			<div class="dcd-caution">
				<span>診断についての注意</span>
				<div class="dcd-caution-text">
					<?php echo $caution; ?>
					<?php
					// 2018/08/25 一旦、機能OFF 
					if (false) {
					?>
						<?php if ( $caution_detail_flg == 1 ): ?>
							<p class="dcd-caution-detail-flg">詳しくは、<label for="modal-trigger">こちら</label>で解説しています。</p>

							<div class="modal">
								<input id="modal-trigger" class="checkbox" type="checkbox">
								<div class="modal-overlay">
									<label for="modal-trigger" class="o-close"></label>
									<div class="modal-wrap">
										<label for="modal-trigger" class="close">&#10006;</label>
										<p><?php echo $caution_detail; ?></p>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php } ?>
				</div>
			</div>
			<div class="dcd-submit">
				<button id="do_diagnosis" type="submit"><img src="<?php echo plugins_url( DCD_Config::NAME ) . '/images/btn-diagnosis.png'; ?>" alt="送信" /></button>
			</div>
			<script>
				var time = new Date();
				var year = time.getFullYear();
				for (var i = year; i >= 1900; i--) {
					$('#year').append('<option value="' + i + '">' + i + '</option>');
				}
			</script>
