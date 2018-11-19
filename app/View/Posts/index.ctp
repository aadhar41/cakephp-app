<div class="panel panel-default text-muted">
  <div class="panel-heading">
    <p>
        Posts
    </p>
  </div>
  <div class="panel-body">

<?php
    //pr($posts); die;
?>


<p><?php echo $this->Html->link("Add Post", array('action' => 'add'),array('class'=>'btn btn-primary pull-left')); ?></p>
<br><br>
<table class="table table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Created By</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

<?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php 
                // Instantiate a DateTime with microseconds.
                $d = new DateTime($post['Post']['created']);

                // Output the date with microseconds.
                echo $d->format('F d, Y H:i:s'); // 2011-01-01T15:03:01.012345
            ?>
        </td>
        
        <td><span class="label label-default"><?php echo ucwords($post['User']['role']); ?></span></td>

        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id']),
                    array('class'=>'btn btn-default')
                );
            ?>
            
            
            <!--
            
                Using postLink() will create a link that uses JavaScript to do a POST request to delete our post. Allowing content to be deleted using GET requests is dangerous, as web crawlers could accidentally delete all your content.

            -->
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?','class'=>'btn btn-default ')
                );
            ?>
        </td>

    </tr>
<?php endforeach; ?>

</table>