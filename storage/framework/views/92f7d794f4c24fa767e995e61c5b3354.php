
<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve(['title' => 'Agenda Unidade Básica de Saúde'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">

    <h2 class="conteudo__subtitulo">Seja bem-vindo!</div>
    <h2 class="conteudo__subtitulo">Gerencie a agenda dos médicos e pacientes de maneira fácil e organizada.</div>

    <div class="banner-grupo">
        <img src="<?php echo e(asset('img/banner-principal.jpg')); ?>" alt="Paciente com seu pai e sua médica" class="banner-grupo__img">
        <ul class="banner-grupo__cards">
            
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-user-doctor"></i>
                <h3 class="banner-grupo__titulo">Médicos</h3>
            </li>
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-hospital-user"></i>
                <h3 class="banner-grupo__titulo">Pacientes</h3>
            </li>
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-house-chimney-medical"></i>
                <h3 class="banner-grupo__titulo">Unidades Básicas de Saúde</h3>
            </li>

        </ul>
    </div>
    <div class="detalhe-fundo"></div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH /var/www/html/agenda-ubs/resources/views/home/index.blade.php ENDPATH**/ ?>