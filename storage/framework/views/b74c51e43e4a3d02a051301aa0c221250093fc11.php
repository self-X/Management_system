<?php $__env->startSection('content'); ?>



    <div class="container">
        <div class="list-group-item clearfix" >
            <?php if (\Entrust::hasRole('Manager')) : ?>
            <a href="/manager/home" class="left">
                <img src="/images/navigate-left-icon.png" width="15" height="15" alt="undo">
            </a>
            <img class="risk-mini left" src="/images/<?php echo e($user->risk_status); ?>.png" width="25" height="25" alt="risk">
            <span class="user-name left" ><?php echo e($user->name); ?></span>
            <span class="user-email right" ><?php echo e($user->email); ?></span>
        </div>
        <div class="list-group-item">
            <p>Add Meeting</p>
            <form method="POST" action="/meeting/<?php echo e($user->id); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" />
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group for-date">
                    <label for="date">Date:</label>
                    <input type="text" class="form-control"  name="date" placeholder="Now by default"/>
                </div>

                <div class="form-group for-send" >
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>

            </form>
            <?php endif; // Entrust::hasRole ?>
            <?php if(count($errors)): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-warning"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <h2>Meetings</h2>
                <table class="table table-responsive  ">
                    <thead>
                    <tr class="header-table" >
                        <th class="text-table" >Subject</th>
                        <th class="text-table" >Manager</th>
                        <th class="text-table" >Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id == $meeting->id): ?>
                                <tr class="specify-meeting-block">
                                    <th class="text-table" >
                                        <a class="links-table" href="/meeting/<?php echo e($user->id); ?>/<?php echo e($item->id); ?>">
                                            <?php echo e($item->title); ?>

                                        </a>
                                    </th>
                                    <th class="text-table" >
                                        <?php echo e($user->withRole('manager')->find($item->manager_id)->name); ?>

                                    </th>
                                    <th class="text-table" >
                                        <?php echo e($item->date); ?>

                                    </th>
                                </tr>
                                <tr>

                                <table class="table-responsive wr-table">
                                    <tr class="description-table">
                                        <th  class="text-table description-th" >
                                            <p class="description" >Desciption</p>
                                            <?php echo e($item->description); ?>

                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th  class="description-th" >
                                            <form method="POST" action="/meeting/<?php echo e($user->id); ?>/<?php echo e($meeting->id); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group">
                                                    <label class="description-mini" for="text">Add Comment:</label>
                                                    <textarea type="text" class="form-control" name="text"></textarea>
                                                </div>

                                                <div class="form-group" >
                                                    <button type="submit" class="btn btn-primary btn-position">
                                                        Send
                                                    </button>
                                                </div>
                                            </form>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th  class="description-th" >
                                            <p class="description-mini">Comments</p>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th class="description-th description-table ">
                                            <span class="ur-fixed">
                                                <?php echo e($user->find($comment->creator_id)->name); ?>

                                            </span>
                                            <span class="ur-fixed">
                                                <?php echo e($comment->created_at); ?>

                                            </span>
                                            <span class="glyphicon glyphicon-edit " ></span>
                                            <span class="glyphicon glyphicon-remove-circle ur-fixed-min "></span>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th class="description-th">
                                            <span class="description-mini">
                                                <?php echo e($comment->text); ?>

                                            </span>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>

                                </tr>
                        <?php else: ?>

                            <tr>
                                <p>
                                    <th class="text-table">
                                        <a class="links-table  link-pad-mini"
                                           href="/meeting/<?php echo e($user->id); ?>/<?php echo e($item->id); ?>">
                                            <?php echo e($item->title); ?>

                                        </a>
                                    </th>
                                    <th class="text-table">
                                        <a href="/meeting/<?php echo e($user->id); ?>/<?php echo e($item->id); ?>"
                                           class="links-table pad link-pad-mini pad">
                                            <?php echo e($user->withRole('manager')->find($item->manager_id)->name); ?>

                                        </a>
                                    </th>
                                    <th class="text-table" style="padding-left: 100px" >
                                        <a href="/meeting/<?php echo e($user->id); ?>/<?php echo e($item->id); ?>"
                                           class="links-table   link-pad-mini pad2">
                                            <?php echo e($item->date); ?>

                                        </a>
                                    </th>
                                </p>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>