<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Inbox</h1>
<a href="/messages/outbox">Go to outbox</a>

<table class="table">
   <thead>
      <tr>
         <th>No</th>
         <th>From</th>
         <th>Messages</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($messages as $key => $message) : ?>
         <tr>
            <td><?= $key + 1; ?></td>
            <td><?= $message->nama; ?></td>
            <td>
               <a href="/messages/view/<?= $message->messages_id ?>">
                  <?= $message->message ?>
               </a>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?= $this->endSection(); ?>