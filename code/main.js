const app = new Vue({
    el: "#app",
    data: {
        newDevice: {Location: null, UserID: null},
        devices: [],
    },
    methods: {
        createDevice(newDevice) {
            fetch("http://127.0.0.1:8080/api/device/create.php", {
                    body: JSON.stringify(newDevice),
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    })
                    .then(() => {
                    })
                    }
    },
    mounted() {
      fetch("http://127.0.0.1:8080/api/device/read.php")
        .then(response => response.json())
        .then((data) => {
          this.devices = data["body"];
        })
    },
    template: `
    <div>
      <li v-for="device in devices">
        {{device.DeviceID}} - {{device.Location}} - {{device.UserID}}
      </li>
        <input v-on:keyup.13="createDevice(newDevice.Location)" v-model="newDevice.Location" placeholder="Location"/>
        <input v-on:keyup.13="createDevice(newDevice.UserID)" v-model="newDevice.UserID" placeholder="UserID"/>
        <button v-on:click="createDevice(newDevice)">create</button>
    </div>
    `,
});