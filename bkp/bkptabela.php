<tr>
	<td><?php echo $conta["id"]?></td>
	<td class="mesDado" style="color: #000;"><?php echo $conta["mes"]?></td>
	<td><?php echo $conta["descricao"]?></td>
	<td><?php echo "R$" .number_format($conta["valor"],2,',','.');?></td>
	<td>
		<a href="excluir.php?id=<?php echo $conta["id"]?>" onclick="return excluir()">Excluir</a>|
		<a href="atualiza.php">Atualizar</a>
	</td>
</tr>