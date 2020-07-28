
<style>
    td{
        width : 100px;
        border: 1px solid black; 
    }
</style>


<table>

    <thead>
        <tr>
            <td>Nom article</td>
            <td>Prix</td>
            <td>Quantité</td>
        </tr>
    </thead>
    <?php 
        $items = $this->Session->get('Cart'); 
        $total = 0;
    ?>

    <?php foreach($items as $item) : ?>
        <tr>
            <td><?=$item['name']?></td>
            <td><?=$item['price']?></td>
            <td><?=$item['quantity']?></td>

        </tr>
        <?php $total = $total + $item['price']*$item['quantity'];?>
    <?php endforeach; ?>
</table>

<h5>Le total est <?=$total?></h5>