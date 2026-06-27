<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl" x-data="app()" >

    </div>
    <script>
        function app(){
            return {
                init :()=>{
                    console.log('running.........')
                    Echo.channel('chat').listen('Example' , (e)=>{
                        console.log('Example Event received') ;
                        console.log(e);
                        console.log(`Welcome ${e.user.name}`)
                    }).listen('Chat.ExampleTwo', (e)=>{
                        console.log('Example Two Event received') ;
                        console.log(e);
                    });
                }
            };
        }
    </script>
</x-layouts::app>
