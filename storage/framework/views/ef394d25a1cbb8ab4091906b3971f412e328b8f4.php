<?php $__env->startSection('content'); ?>
    <div class="row-upgraded-md">
            <!--Employees block-->
            <div class="list-group add-hidden-border list-group-upgrade-lg">
                <div class="list-group-item">
                    <b>Employees</b>
                </div>
                <div class="list-group-item">

                    <div class="form-group" style="width: 100%">
                        <form method="post" action="/manager/search" class="navbar-form" role="search">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="name"  class="form-control" style="width:75%"  placeholder="Name">
                            <input type="submit" value="Search" class="btn btn-primary">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                        <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <table class="table table-responsive  table-hover">
                        <thead>
                        <tr>
                            <th>Risk</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Joined at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><a href="/meeting/<?php echo e($user->id); ?>"><img src="/images/<?php echo e($user->risk_status); ?>.png" width="25" height="25" alt=""></a></th>
                            <th><a href="/meeting/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></a></th>
                            <th><a href="/meeting/<?php echo e($user->id); ?>"><?php echo e($user->last_name); ?></a></th>
                            <th><a href="/meeting/<?php echo e($user->id); ?>"><?php echo e($user->email); ?></a></th>
                            <th><a href="/meeting/<?php echo e($user->id); ?>"><?php echo e($user->join_date); ?></a></th>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $users->render(); ?>

                </div>
            </div>
            <!--/Employees block-->

            <div class="recommended row row-upgraded-md ">
                    <div class="list-group-item">
                        <b>Recommended meetings</b>
                    </div>
                    <div class="list-group-item">
                        <table class="table  table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>Risk</th>
                                <th scope="row">First Name</th>
                                <th>data</th>
                                <th>fullday</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php $__currentLoopData = $recommended; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($key <=9): ?>
                            <tr>
                                <th scope="row"><a href="/meeting/<?php echo e($users['id']); ?>"><img src="/images/<?php echo e($users['risk_status']); ?>.png" width="25" height="25" alt=""></a></th>
                                <th scope="row"><a href="/meeting/<?php echo e($users['id']); ?>"><?php echo e($users['name']); ?></a></th>
                                <th><a href="/meeting/<?php echo e($users['id']); ?>"><?php echo e($users['date']); ?></a></th>
                                <th><a href="/meeting/<?php echo e($users['id']); ?>"><?php echo e($users['fullday']); ?></a></th>
                            </tr>
                            <?php else: ?>
                               <?php break; ?>
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

            </div>

        <div class="latest-meeting row ">
            <div class="list-group-item">
                <b>latest meetings</b>
            </div>
            <div class="list-group-item">
                <table class="table  table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th scope="row">Meeting title</th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row">
                            <a href="/meeting/<?php echo e($meeting->user_id); ?>/<?php echo e($meeting->id); ?>">
                                <?php echo e($meeting->title); ?>

                            </a>
                        </th>
                        <th><a href="#"><?php echo e($meeting->date); ?></a></th>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>