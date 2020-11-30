<div class="container-fluid px-5">
    <p class="h1 py-3">Students</p>
    <div class="table-responsive">
        <table class="table table-sm text-nowrap sortable">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            {foreach from=$STUDENTS item=$student}
            <tr>
            {if $student}
                {if isset($student.email) }
                    <td>{$student.email}</td>
                {else}
                    <td>-</td>
                {/if}
                {if isset($student.name) }
                    <td>{$student.name}</td>
                {else}
                    <td>-</td>
                {/if}
                {if isset($student.last_name) }
                    <td>{$student.last_name}</td>
                {else}
                    <td>-</td>
                {/if}

                {if isset($student.status) }
                    {if $student.status == '255'}
                        <td><span class="badge badge-red">Waiting for student data</span></td>
                    {elseif $student.status == '1'}
                        <td><span class="badge badge-green">Running</span></td>
                    {else}
                    {/if}
                {else}
                    <td>-</td>
                {/if}
                {if isset($student.u_id)}
                    <td>
                        <button class="btn btn-danger btn-xs _delete" style="padding: .1rem .4rem; font-size: 15px;" data-url="deleteStudent"
                        data-id="{$student.u_id}">Delete</button>
                    </td>
                {else}
                    <td></td>
                    <td></td>
                {/if}
           {else}
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
            {/if}

            </tr>
            {/foreach}
        </table>
    </div>
</div>
