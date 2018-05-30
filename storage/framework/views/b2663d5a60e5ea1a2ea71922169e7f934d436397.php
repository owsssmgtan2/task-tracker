<!DOCTYPE html>
<html lang="en">

    <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <body class="fix-header">
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>

        <?php if(Auth::check()): ?>
            <div id="wrapper">
                <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        
                        <?php echo $__env->make('layouts.content-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php echo $__env->yieldContent('main-content'); ?>
                    </div>
                    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        <?php else: ?>
            <div id="wrapper">
                <?php echo $__env->yieldContent('login-content'); ?>
                <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endif; ?>

        <?php echo $__env->make('layouts.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </body>


</html>