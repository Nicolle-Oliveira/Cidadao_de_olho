<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cidadao de olho</title>
</head>
<body>
    
    <h1>Cidadao de olho</h1>

    <div class='redes_usadas'>
        <h3>Redes mais usadas</h3>
        <p>Confira as redes mais usadas pelos deputados! </p>
        <ul>
            <?php $__currentLoopData = $redes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($redes[$i]->nome); ?> (<?php echo e($redes[$i]->quant); ?>) usuários </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <div class=>

    </div>
</body>
</html><?php /**PATH C:\laragon\www\cidadao_de_olho\resources\views/info.blade.php ENDPATH**/ ?>