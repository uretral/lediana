$(document).ready(function () {

    let hide = [1, 2, 4]

    $('.tree_branch_delete').each(function (i, el) {

        if ($.inArray(Number($(el).attr('data-id')), hide) !== -1) {
            $(el).remove()
            console.log('jhgfd');
        }

    })
});
