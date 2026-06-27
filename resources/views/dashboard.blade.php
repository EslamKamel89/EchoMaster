<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl" x-data="app()">
        <div>
            <template x-if="dispatched">
                <div>
                    Event received
                </div>
            </template>
        </div>
    </div>
    <script>
    function app() {
        return {
            dispatched: false,
            init() {
                console.log('running.........')
                // Echo.channel('chat').listen('Example' , (e)=>{
                //     console.log('Example Event received') ;
                //     console.log(e);
                //     console.log(`Welcome ${e.user.name}`)
                // }).listen('Chat.ExampleTwo', (e)=>{
                //     console.log('Example Two Event received') ;
                //     console.log(e);
                // });
                // Echo.private(`users.${channelName}`).listen('Example',(e)=>{
                //     console.log('Example Event received') ;
                //     console.log(e);
                //     console.log(`Welcome ${e.user.name}`)
                // });
                let userId = "{{ auth()->id() }}";
                Echo.private(`users.${userId}`).listen('OrderDispatched', (e) => {
                    console.log(e);
                    this.dispatched = true;
                    console.log(this.dispatched)
                });
            },
        };
    }
    </script>
</x-layouts::app>
