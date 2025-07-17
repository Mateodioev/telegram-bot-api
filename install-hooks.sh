#!/bin/bash

# Install git hooks script
# This script copies git hooks from the hooks/ directory to .git/hooks/

echo "Installing git hooks..."

# Check if we're in a git repository
if [ ! -d ".git" ]; then
    echo "Error: Not a git repository"
    exit 1
fi

# Check if hooks directory exists
if [ ! -d "hooks" ]; then
    echo "Error: hooks directory not found"
    exit 1
fi

# Create .git/hooks directory if it doesn't exist
mkdir -p .git/hooks

# Copy all hooks from hooks/ to .git/hooks/
for hook in hooks/*; do
    if [ -f "$hook" ]; then
        hook_name=$(basename "$hook")
        echo "Installing $hook_name..."
        cp "$hook" ".git/hooks/$hook_name"
        chmod +x ".git/hooks/$hook_name"
    fi
done

echo "Git hooks installed successfully!"
echo "The following hooks are now active:"
ls -la .git/hooks/ | grep -v sample | grep -v "^d" | awk '{print "  " $9}'