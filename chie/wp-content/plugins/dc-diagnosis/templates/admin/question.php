<p class="dcd-item-name <?php if ( $qno == 1 ): ?>required<?php endif; ?>">質問<?php echo esc_attr( $qno ); ?></p>
<p class="dcd_validation_error e_dc_diagnosis_question<?php echo esc_attr( $qno ); ?>"></p>
<p class="dcd_validation_error e_dc_diagnosis_question<?php echo esc_attr( $qno ); ?>_text"></p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_text][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_text ); ?>" maxlength="100">
<p class="dcd-item-name <?php if ( $qno == 1 ): ?>required<?php endif; ?>">質問<?php echo esc_attr( $qno ); ?>のポイント</p>
<p class="dcd_validation_error e_dc_diagnosis_question<?php echo esc_attr( $qno ); ?>_point"></p>
<ul class="question_point">
	<li>1.<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_point1][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_point1 ); ?>" maxlength="2"></li>
	<li>2.<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_point2][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_point2 ); ?>" maxlength="2"></li>
	<li>3.<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_point3][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_point3 ); ?>" maxlength="2"></li>
	<li>4.<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_point4][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_point4 ); ?>" maxlength="2"></li>
	<li>5.<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[question_point5][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $question_point5 ); ?>" maxlength="2"></li>
</ul>
