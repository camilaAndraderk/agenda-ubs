<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve(['title' => 'Recepcionistas'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php if(isset($mensagemSucesso)): ?>
        <div class="aviso aviso--verde">
            <?php echo e($mensagemSucesso); ?>

        </div>
    <?php endif; ?>

    <dutton class="botao"><a href="<?php echo e(route('recepcionistas.create')); ?>">Cadastrar</a></dutton>
    
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Nome
                </th>
                <th class="tabela__cabecalho__coluna">
                    CPF
                </th>
                <th class="tabela__cabecalho__coluna">
                    Ver +
                </th>
                <th class="tabela__cabecalho__coluna">
                    Editar
                </th>
                <th class="tabela__cabecalho__coluna">
                    Apagar
                </th>
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            <?php $__currentLoopData = $recepcionistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recepcionista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna">
                        <?php echo e($recepcionista['nome']); ?>

                    </td>
                    <td class="tabela__corpo__coluna">
                        <?php echo e($recepcionista['cpf']); ?>

                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <a href="">
                            <span class="tag tag--icone tag--azul">
                            <i class="fa-solid fa-info"></i>
                            </span>
                        </a>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <span class="tag tag--icone tag--verde-agua">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <form action="<?php echo e(route('recepcionistas.destroy', $recepcionista['id'])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="tag tag--icone tag--vermelho">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>    


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH /var/www/html/agenda-ubs/resources/views/recepcionistas/index.blade.php ENDPATH**/ ?>