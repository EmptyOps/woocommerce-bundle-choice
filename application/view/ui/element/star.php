<?php if(isset($rate)): ?>

<ul>
	<?php for($i=1;$i<=5;$i++): ?>
	<li>
		<a href="#">
			<span class="material-icons">
				<?php if($rate==0):?>
				star_border
				<?php elseif($rate>=$i):?>
				star_rate
				<?php elseif($rate<$i and $rate>($i-1)):?>
				star_half
				<?php else: ?>
				star_empty
			<?php endif; ?>
			</span>
		</a>		
	</li>
	<?php endfor; ?>
</ul>

<?php endif; ?>
