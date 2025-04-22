import os

def replace_mysqli_query(folder_path):
    total_files = 0
    updated_files = 0
    skipped_files = 0

    print(f"Processing folder: {folder_path}")

    # Loop through all files and subdirectories in the given folder
    for root, dirs, files in os.walk(folder_path):
        for file in files:
            total_files += 1

            # Debug: Print every file found
            print(f"Found file: {file}")

            # Skip files named 'config.php'
            if file == 'config.php':
                skipped_files += 1
                print(f"Skipped (config.php): {os.path.join(root, file)}")
                continue
            
            # Check if the file is a PHP file
            if file.endswith('.php'):
                file_path = os.path.join(root, file)

                try:
                    # Open the file and read its contents, ignoring encoding errors
                    with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
                        content = f.read()

                    # Replace 'mysqli_query($con,' with 'execute_query('
                    updated_content = content.replace('mysqli_query($con,', 'execute_query(')

                    # Write the updated content back to the file if any changes were made
                    if content != updated_content:
                        with open(file_path, 'w', encoding='utf-8') as f:
                            f.write(updated_content)
                        updated_files += 1
                        print(f"Updated: {file_path}")
                    else:
                        print(f"No changes: {file_path}")
                
                except Exception as e:
                    print(f"Error processing {file_path}: {e}")
    
    # Print summary
    print("\n=== Process Summary ===")
    print(f"Total files processed: {total_files}")
    print(f"Files updated: {updated_files}")
    print(f"Files skipped (config.php): {skipped_files}")

# Example usage:
folder_path = '/var/www/extramileplay/php/Equity-Feud'  # Replace with the path to your folder
replace_mysqli_query(folder_path)