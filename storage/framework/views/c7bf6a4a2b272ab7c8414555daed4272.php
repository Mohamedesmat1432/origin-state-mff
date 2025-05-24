 
 <div class="flex flex-col overflow-x-auto">
     <div class="sm:-mx-6 lg:-mx-8">
         <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <table class="table-fixed min-w-full">
                <caption class="text-lg font-bold">
                    <?php echo e($caption ?? ''); ?>

                </caption>

                <thead class="text-center font-bold  whitespace-nowrap">
                    <?php echo e($thead ?? ''); ?>

                </thead>

                <tbody class="text-center">
                    <?php echo e($tbody ?? ''); ?>

                </tbody>
            </table>
         </div>
     </div>
 </div>
 
<?php /**PATH /var/www/resources/views/components/table.blade.php ENDPATH**/ ?>