<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFjFFv4s\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFjFFv4s/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFjFFv4s.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFjFFv4s\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFjFFv4s\App_KernelDevDebugContainer([
    'container.build_hash' => 'FjFFv4s',
    'container.build_id' => '97027da3',
    'container.build_time' => 1643628443,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFjFFv4s');
