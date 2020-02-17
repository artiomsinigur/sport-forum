<tr class="border-bottom">
    <td class="thread-avatar">
        <img class="thread-avatar-img" src="https://placeimg.com/35/35/any" alt="">
    </td>
    <td class="thread-title">
        <a href='<?="index.php?Topics&action=topic&id={$topic->getTopicId()}"?>' class="thread-topic-name"><?=htmlspecialchars($topic->getTopicTitle())?></a>
    </td>
    <td class="thread-author">
        <a href="" class="thread-author-profile d-block"><?=htmlspecialchars($topic->memberTopic)?></a>
        <span class="thread-author-published"><small><?=htmlspecialchars($topic->getTopicPublished())?></small></span>
    </td>
    <td class="thread-posts">
        <span class="thread-count-posts"><?= htmlspecialchars($topic->nrPostsByTopic)?></span>
    </td>
    <td class="thread-views">
        <span class="thread-count-views">3,560</span>
    </td>
    <td class="thread-last-post">
        <a href="" class="thread-last-post-author d-block"><?=htmlspecialchars($topic->memberPost)?></a>
        <span class="thread-last-post-published"><small><?=htmlspecialchars($topic->post_published)?></small></span>
    </td>
</tr><!-- /end table row -->