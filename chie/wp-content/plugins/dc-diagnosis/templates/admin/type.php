<p class="dcd_validation_error e_dc_diagnosis_type<?php echo esc_attr( $qno ); ?>"></p>
<p class="dcd-item-name <?php if ( $qno == 1 ): ?>required<?php endif; ?>">タイプ<?php echo esc_attr( $qno ); ?></p>
<p class="dcd_validation_error e_dc_diagnosis_type<?php echo esc_attr( $qno ); ?>_point"></p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[type_min][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $type_min ); ?>" maxlength="2" class="type_min_max"></li>　〜　<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[type_max][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $type_max ); ?>" maxlength="2" class="type_min_max">
<p class="dcd-item-name">見出し</p>
<p class="dcd_validation_error e_dc_diagnosis_type<?php echo esc_attr( $qno ); ?>_title"></p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[type_title][<?php echo esc_attr( $qno ); ?>]" value="<?php echo esc_attr( $type_title ); ?>" maxlength="100">
<p class="dcd-item-name">解説</p>
<p class="dcd_validation_error e_dc_diagnosis_type<?php echo esc_attr( $qno ); ?>_description"></p>
<?php wp_editor( $type_description, 'dcd_type_description_'.$qno, array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
