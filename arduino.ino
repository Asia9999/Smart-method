
const filter = {
  usbVendorId: 0x2341 // Arduino SA
};

try {
  const port = await navigator.serial.requestPort({filters: [filter]});
  // Continue connecting to |port|.
} catch (e) {
  // Permission to access a device was denied implicitly or explicitly by the user.
}

await port.open({ baudRate: /* pick your baud rate */ });
```

const encoder = new TextEncoder();
const writer = port.writable.getWriter();
writer.write(encoder.encode("AT"));

const decoder = new TextDecoder();
const reader = port.readable.getReader();
const { value, done } = await reader.read();
console.log(decoder.decode(value));
// Expected output: OK

```javascript
writer.releaseLock();
reader.releaseLock();
await port.close();
```


const reader = port.readable.getReader();
while (true) {
  const { value, done } = await reader.read();
  if (done) {
    // |reader| has been canceled.
    break;
  }
  // Do something with |value|...
}
reader.releaseLock();


await reader.cancel();
await port.close();

while (port.readable) {
  const reader = port.readable.getReader();
  while (true) {
    let value, done;
    try {
      ({ value, done } = await reader.read());
    } catch (error) {
      // Handle |error|...
      break;
    }
    if (done) {
      // |reader| has been canceled.
      break;
    }
    // Do something with |value|...
  }
  reader.releaseLock();
}

const encoder = new TextEncoderStream();
const writableStreamClosed = encoder.readable.pipeTo(port.writable);
const writer = encoder.writable.getWriter();
writer.write("AT");

const decoder = new TextDecoderStream();
const readableStreamClosed = port.readable.pipeTo(decoder.writable);
const reader = decoder.readable.getReader();
const { value, done } = await reader.read();
console.log(value);
// Expected output: OK

writer.close();
await writableStreamClosed;
reader.cancel();
await readableStreamClosed.catch(reason => {});
await port.close();
```


await port.setSignal({ dataTerminalReady: false });
await new Promise(resolve => setTimeout(200, resolve));
await port.setSignal({ dataTerminalReady: true });
```

// Check to see what ports are available when the page loads.
document.addEventListener('DOMContentLoaded', async () => {
  let ports = await navigator.serial.getPorts();
  // Populate the UI with options for the user to select or automatically
  // connect to devices.
});

navigator.serial.addEventListener('connect', e => {
  // Add |e.target| to the UI or automatically connect.
});

navigator.serial.addEventListener('disconnect', e => {
  // Remove |e.target| from the UI. If the device was open the disconnection can
  // also be observed as a stream error.
});
