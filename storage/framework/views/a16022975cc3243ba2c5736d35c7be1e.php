<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.css')); ?>">
    <script src="<?php echo e(asset('js/jquery.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/menu-principal.js')); ?>" defer></script>

    <title>Agenda UBS</title>
</head>
<body class="body" data-body>
    
    <header class="header">
        <div class="header__principal">
            <a href="<?php echo e(asset('/home')); ?>" >
                <img src="<?php echo e(asset('img/logo-agenda-ubs.png')); ?>" alt="Logo da agenda da unidade básica de saúde" class="header__img">    
            </a>
            <label class="icone-menu" data-icone-menu="abrir">
                <input type="checkbox" class="icone-menu__input" data-icone-menu-input>
                <span class="icone-menu__span icone-menu__span-superior" data-icone-menu-superior></span>
                <span class="icone-menu__span icone-menu__span-centro" data-icone-menu-centro></span>
                <span class="icone-menu__span icone-menu__span-inferior" data-icone-menu-inferior></span>
            </label>
            <div class="menu-principal menu-principal--mobile" data-div-menu-principal>
                <ul class="menu-principal__lista menu-principal__lista--mobile" data-menu-principal>
                   
                    <?php $__currentLoopData = $menuPrincipal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cadaOpcao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($cadaOpcao['url']); ?>" class="menu-principal__link">
                            <li class="menu-principal__item menu-principal__item--mobile">
                                <p><?php echo e($cadaOpcao['label']); ?></p>
                            </li>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="conteudo">
            <div class="conteudo__container">
                <h1 class="conteudo__titulo"> <?php echo e($title); ?> </h1>
    
                <div class="conteudo__principal">
                    <?php echo e($slot); ?>

                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container">
            <a class="link" target="_blank" href="https://www.freepik.com/free-photo/happy-female-doctor-giving-high-fie-little-boy-who-came-with-father-hospital_25566815.htm#fromView=search&page=1&position=3&uuid=0f9107d5-5876-40f3-b45c-14e93b87cda1">Image by Drazen Zigic on Freepik</a>
            <p class="footer__p" >Desenvolvido por: Camila Andrade</p>
        </div>

        <ul class="lista-redes-sociais">
            <li class="lista-redes-sociais__item"><a href="https://www.facebook.com/versatecoficial" target="_blank"><i class="fa-brands fa-facebook-square"></i></a></li>
            <li class="lista-redes-sociais__item"><a href="https://www.instagram.com/versasaude/" target="_blank"><i class="fa-brands fa-instagram-square"></i></a></li>
            <li class="lista-redes-sociais__item"><a href="https://ava.versasaude.com.br/" target="_blank"><i class="fa-brands fa-youtube-square"></i></a></li>
        </ul>

    </footer>
    
</body>
</html><?php /**PATH /var/www/html/agenda-ubs/resources/views/components/layout.blade.php ENDPATH**/ ?>