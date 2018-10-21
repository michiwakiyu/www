<p class="dcd-item-name required">診断についての注意事項</p>
<p class="dcd_validation_error e_dc_diagnosis_caution"></p>
<?php wp_editor( $caution, 'dcd_caution', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
<?php 
// 2018/08/25 一旦、機能OFF
if (false) {
?>
<p><label><input type="checkbox" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[caution_detail_flg]" value="1" <?php if( $caution_detail_flg == 1 ) echo "checked" ; ?>>「詳しくはこちらで解説しています」を表示する</label></p>
<p class="dcd-item-name required-caution">「詳しくはこちらで解説しています」の説明文</p>
<p class="dcd_validation_error e_dc_diagnosis_caution_detail"></p>
<?php wp_editor( $caution_detail, 'dcd_caution_detail', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
<?php } ?>
<div class="postbox">
<div class="inside">
<p class="dcd-item-name">尺度の基準</p>
<p class="dcd-item-name">ポイントが高い場合の文言</p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[scale_high]" value="<?php echo esc_attr( $scale_high ); ?>" maxlength="100">
<p class="dcd_validation_error e_dc_diagnosis_scale_high"></p>
<p class="dcd-item-name">ポイントが低い場合の文言</p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[scale_low]" value="<?php echo esc_attr( $scale_low ); ?>" maxlength="100">
<p class="dcd_validation_error e_dc_diagnosis_scale_low"></p>
</div>
</div>
<div class="postbox">
<div class="inside">
<p class="dcd-item-name">各グラフの概説</p>
<p class="dcd-item-name">男女別比較</p>
<p class="dcd_validation_error e_dc_diagnosis_graph_description_gender"></p>
<?php wp_editor( $graph_description_gender, 'dcd_graph_description_gender', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
<br />
<p class="dcd-item-name">年代別比較</p>
<p class="dcd_validation_error e_dc_diagnosis_graph_description_age"></p>
<?php wp_editor( $graph_description_age, 'dcd_graph_description_age', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
<br />
<p class="dcd-item-name">人数群比較</p>
<p class="dcd_validation_error e_dc_diagnosis_graph_description_number"></p>
<?php wp_editor( $graph_description_number, 'dcd_graph_description_number', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
</div>
</div>
<div class="postbox">
<div class="inside">
<p class="dcd-item-name">全国調査について</p>
<p><label><input type="checkbox" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[national_survey_flg]" value="1" <?php if( $national_survey_flg == 1 ) echo "checked" ; ?>>全国調査を実施する</label></p>
<p class="dcd-item-name">全国調査の解説</p>
<p class="dcd_validation_error e_dc_diagnosis_graph_description_national"></p>
<?php wp_editor( $graph_description_national, 'dcd_graph_description_national', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
</div>
</div>
