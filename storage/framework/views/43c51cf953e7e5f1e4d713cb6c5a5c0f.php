<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcionistas</title>
</head>
<body>
    
    
    <?php $__currentLoopData = $recepcionistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recepcionista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li> <?php echo e($recepcionista); ?> </li>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</body>
</html><?php /**PATH /var/www/html/agenda-ubs/resources/views/listar-recepcionistas.blade.php ENDPATH**/ ?>