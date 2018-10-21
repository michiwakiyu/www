		<div class="dcd-question">
			<dl>
				<dt><span><?php echo esc_html( $question_number ); ?>．</span></dt>
				<dd><?php echo esc_html( $question_text ); ?></dd>
			</dl>
			<ul>
				<li><input type="radio" id="p1_<?php echo esc_html( $question_number ); ?>" name="dcd-question[<?php echo esc_html( $question_number ); ?>]" value="<?php echo esc_attr( $question1_point ); ?>"><label for="p1_<?php echo esc_html( $question_number ); ?>">１</label></li>
				<li><input type="radio" id="p2_<?php echo esc_html( $question_number ); ?>" name="dcd-question[<?php echo esc_html( $question_number ); ?>]" value="<?php echo esc_attr( $question2_point ); ?>"><label for="p2_<?php echo esc_html( $question_number ); ?>">２</label></li>
				<li><input type="radio" id="p3_<?php echo esc_html( $question_number ); ?>" name="dcd-question[<?php echo esc_html( $question_number ); ?>]" value="<?php echo esc_attr( $question3_point ); ?>" checked><label for="p3_<?php echo esc_html( $question_number ); ?>">３</label></li>
				<li><input type="radio" id="p4_<?php echo esc_html( $question_number ); ?>" name="dcd-question[<?php echo esc_html( $question_number ); ?>]" value="<?php echo esc_attr( $question4_point ); ?>"><label for="p4_<?php echo esc_html( $question_number ); ?>">４</label></li>
				<li><input type="radio" id="p5_<?php echo esc_html( $question_number ); ?>" name="dcd-question[<?php echo esc_html( $question_number ); ?>]" value="<?php echo esc_attr( $question5_point ); ?>"><label for="p5_<?php echo esc_html( $question_number ); ?>">５</label></li>
			</ul>
		</div>
