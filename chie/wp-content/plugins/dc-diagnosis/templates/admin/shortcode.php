<?php if ( $id ) : ?>
<table class="dcd-shortcode-table">
			<th>診断ID：</th>
			<td><p><?php echo esc_attr( $id ); ?></p></td>
			<th>ショートコード：</th>
			<td><p>[shindan id=<?php echo esc_attr( $id ); ?>]</p><span>※投稿本文に貼り付けて使用してください。</span></td>
</table>
<?php endif; ?>
